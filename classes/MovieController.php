<?php

class MovieController {
    private $command;

    private $db;
    
    // If using Monolog (with Composer)
    //private $logger;

    public function __construct($command) {
        //***********************************
        // If we use Composer to include the Monolog Logger
        // global $log;
        // $this->logger = new \Monolog\Logger("FinanceController");
        // $this->logger->pushHandler($log);
        //***********************************

        $this->command = $command;

        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            case "enterReview":
                $this->enterReview();
                break;
            case "seeReviews":
                $this->seeReviews();
                break;
            case "homePage":
                $this->homePage();
                break;
            case "editInfo":
                $this->editInfo();
                break;
            case "logout":
                $this->destroyCookies();
            case "login":
            default:
                $this->login();
        }
    }

    private function destroyCookies() {
        session_destroy();
        // setcookie("name", "", time() - 3600);
        // setcookie("email", "", time() - 3600);
        //setcookie("score", "", time() - 3600);
        //echo "Hi " . $_SESSION["name"];
    }

    private function login() {
        $error_msg = "";
        if (isset($_POST["email"])) 
        {
            $email = $_POST["email"];
            $thing = $this->validateEmail($email);
            if($thing == true){
                //echo "email is valid";
                $data = $this->db->query("select * from movie_userinfo where email = ?;", "s", $_POST["email"]);
                if ($data === false) 
                {
                    $error_msg = "Error checking for user";
                } 
                else if (!empty($data)) 
                {
                    if (password_verify($_POST["password"], $data[0]["password"])) {
                        $_SESSION["name"] = $data[0]["name"]; 
                        setcookie("name", $data[0]["name"], time() + 3600);
                        $_SESSION["email"] = $data[0]["email"];
                        //setcookie("email", $data[0]["email"], time() + 3600);
                        //setcookie("score", $data[0]["score"], time() + 3600);
                        header("Location: ?command=homePage");
                    } else {
                        $error_msg = "Wrong password";
                    }
                } 
                else 
                { // empty, no user found
                    // TODO: input validation
                    // Note: never store clear-text passwords in the database
                    //       PHP provides password_hash() and password_verify()
                    //       to provide password verification
                    $insert = $this->db->query("insert into movie_userinfo (name, email, password) values (?, ?, ?);", 
                            "sss", $_POST["name"], $_POST["email"], 
                            password_hash($_POST["password"], PASSWORD_DEFAULT));
                    if ($insert === false) {
                        $error_msg = "Error inserting user";
                    } else {
                        $_SESSION["name"] = $_POST["name"];
                        setcookie("name", $data[0]["name"], time() + 3600);
                        //setcookie("name", $_POST["name"], time() + 3600);
                        $_SESSION["email"] = $_POST["email"];
                        //setcookie("email", $_POST["email"], time() + 3600);
                        //setcookie("score", 0, time() + 3600);
                        header("Location: ?command=homePage");
                    }
                }
            }
            else if($this->validateEmail($_POST["email"]) == false){
                $error_msg = "Invalid email format, please try again";
                //echo $error_msg;
            }
        }
        
        include("templates/login.php");
    }

    //function to validate email using regex
    private function validateEmail($email) { 
        /*...*/ 
        $answer = true;
        $pattern = "/[a-zA-Z0-9_+-]?([a-zA-Z0-9_+-]+\.[a-zA-Z0-9_+-]+)?@([a-zA-Z0-9_+-]+\.[a-zA-Z0-9_+-]+)+/";
        //echo "regex match: ". preg_match($regex, $email). "\n";
        if (preg_match($pattern, $email) == 0 ){
            $answer = false;
        }
        //echo $answer;
        return $answer; // Outputs true if match, else false
    }
    

    private function homePage() 
    {
        $newUserInfo = $this->updateUserInfo();

        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_SESSION["email"],
            //"score" => $_COOKIE["score"]
        ];

        //$email = $_SESSION["email"];
        //$avgMsg = $this->db->query("select avg(rating) from movie_reviews where title = ? order by date desc;", "s", $email);

        include("templates/home.php");
    }
    private function seeReviews() 
    {
        $transac = $this->loadNewReview();

        //$this->logger->debug("Loaded question", $question);
        $email = $_SESSION["email"];

        $msg = $this->db->query("select * from movie_reviews where user_email = ? order by date desc;", "s", $email); //("select id, question, answer from question order by rand() limit 1;");
        
        $msg2 = $this->db->query("select title, rating from movie_reviews where user_email = ? order by rating desc;", "s", $email);

        $msg3 = $this->db->query("select category, review from movie_reviews where user_email = ? order by category;", "s", $email);

        
        //$sql = "select * from hw5_transaction where user_email = ? order by t_date desc;";
        //$fetchData = fetch_data($data); //($db, $sql, $email);

        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_SESSION["email"],
            //"score" => $_SESSION["score"]
        ];

        /*
        $message = "";
        if (isset($_POST["answer"])) {
            $answer = $_POST["answer"];
            // look up the question that the user answered
            $data = $this->db->query("select answer from question where id = ?;", "i", $_POST["questionid"]);
            if ($data === false) {
                $message = "<div class='alert alert-danger'>An error occurred</div>";
            } else if (!isset($data[0])) {
                $message = "<div class='alert alert-danger'>That question didn't exist</div>";
            } else if ($data[0]["answer"] == $_POST["answer"]) {
                $message = "<div class='alert alert-success'><b>$answer</b> was correct!</div>";

                $user["score"] += 10;
                setcookie("score", $user["score"], time() + 3600);
                $this->db->query("update user set score = ? where email = ?;", "is", $user["score"], $user["email"]);
            } else {
                $message = "<div class='alert alert-danger'><b>$answer</b> was incorrect.  The correct was {$data[0]["answer"]}.</div>";
            }
        }
        */
        include("templates/seeReviews.php");
    }

    /*
    private function fetch_data($result)
    {
        //$result = $this->db->query($sql, "s", $email); //("select * from hw5_transaction where user_email = ? order by t_date desc;"); //("select id, question, answer from question order by rand() limit 1;");

        if($result== true)
        { 
            if ($result->num_rows > 0) 
            {
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
            } 
            else 
            {
                $msg= "No Data Found"; 
            }
        }
        else
        {
            $msg= mysqli_error($db);
        }
        return $msg;
    }
    */
    
    private function loadNewReview() {
       // get the post records
       if (isset($_POST["title"]) and isset($_POST["category"]) and isset($_POST["date"]) and isset($_POST["review"]) and isset($_POST["rating"])) 
       {
            $category = $_POST['category'];
            $date = $_POST['date'];
            $review = $_POST['review'];
            $title = $_POST['title'];
            $rating = $_POST['rating'];


            if ($rating < 0) 
            {   
                $rating = 0;
                //echo "Please make sure rating is between 0 -10 \n";      
            }
            if ($rating > 10){
                $rating = 10;
                //echo "Please make sure rating is between 0 -10 \n";
            }   

            $email = $_SESSION["email"];
            // database insert SQL code
            $sql = "insert into `movie_reviews` (`id`, `user_email`, `date`, `category`, `title`, `review`, `rating`) values (?, ?, ?, ?, ?, ?, ?);";

            // insert in database 
            $rs = $this->db->query($sql, "sssssss", '0', $email, $date, $category, $title, $review, $rating); //mysqli_query($con, $sql);

            if($rs)
            {
                echo "New Review Had Been Inserted Into Database \n";
                return $rs;
            }
        }
        
        /*
        if (!isset($data[0])) {
            die("No questions in the database");
        }
        $question = $data[0];
        return $question;
        */

        //select * from hw5_transaction where user_email = ? order by t_date desc;
        //select sum(amount) as balance from hw5_transaction where user_email = ?;
        //select category, sum(amount) as balance from hw5_transaction group by category;

    }

    private function updateUserInfo() {
        // get the post records
        if (isset($_POST["name"])) 
        {
            $name = $_POST['name'];
             //$date = $_POST['date'];
             //$review = $_POST['review'];
             //$title = $_POST['title'];
             //$rating = $_POST['rating'];
 
             $email = $_SESSION["email"];
             setcookie("name", $_POST["name"], time() + 3600);
             $_SESSION["name"] = $_POST["name"];
             // database insert SQL code
             //$sql = "insert into `movie_reviews` (`id`, `user_email`, `date`, `category`, `title`, `review`, `rating`) values (?, ?, ?, ?, ?, ?, ?);";
 
             // insert in database 
             //$rs = $this->db->query($sql, "sssssss", '0', $email, $date, $category, $title, $review, $rating); //mysqli_query($con, $sql);
            
            $rs = $this->db->query("update movie_userinfo set name = ? where email = ?", "ss", $name, $email);
            if($rs)
            {
                echo "User Information Has Been Updated In Database \n";
                return $rs;
            }
         }
    }

    private function enterReview() {
        //$data = $this->db->query("select id, question, answer from question order by rand() limit 1;");
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_SESSION["email"],
            //"score" => $_COOKIE["score"]
        ];
        
        include("templates/enterReview.php");
    }

    private function editInfo() {
        //$data = $this->db->query("select id, question, answer from question order by rand() limit 1;");
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_SESSION["email"],
            //"score" => $_COOKIE["score"]
        ];
        
        include("templates/editInfo.php");
    }
}