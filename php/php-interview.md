# PHP Interview & Coding Questions  
(Entry-Level, Junior)  
note: i ask AI to give me some php interview questions with no asnwers and make it a markdown. 
---

## Entry-Level
**Interview Questions**
1. What is PHP used for?  
>PHP is the most popular scripting language, PHP stands for Hypertext Preprocessor, and it is mosly used for web development to create dynamic web pages.

2. Difference between echo and print. 
>both is used to output text but echo is mostly used while print is sometimes use, echo can take multiple parameters but print can only output 1 string and always returns 1 

'''php 
<?php 
    echo "Hello world!";
    echo "Hello" . . "world";
    echo "Hello ", "how are you?" //print doesn't take this 

    print "hi"; 
    $val = print("Hello");
    echo $val //it will print out (Hello1)
?>



3. What are superglobals?  
>superglobals is a variable are available in any part of the code, superglobal is mainly use to store or get information to one page and another such as:

'''php 
<?php
    $_GET['name'] -> Get method: it use to collect data in the html form
    $_POST[] -> Post method: collects and read data based by the user input
    $_SESSION[] -> Stores a session on your computer and when you clos the tab or browser the session will expired 
    $_COOKIE[] -> cookie is use to track information in the website, ang it is use to 
    $_SERVER[] -> contains server and environment info 
    $_FILES[] -> handles files upload in the form/ using the enctype="multipart/form-data"
?>

4. Difference between == and ===. 
>== is for loose comparison and === is for strict comparison



5. How do you declare variables in PHP?  
> by using the $ sign here are the example of declaring variables in php 

'''php 
<?php
    $name = "my name"; string
    $num = 1; integer
    $isRead = true; boolean
    $dec = 1.2; float

?>

6. What is isset() vs empty()?  
>isset() checks if a variable has value and empty() checks if a variable is empty ("", null, 0 false, [])


'''php
<?php

    if(isset($_GET['name'])){
        echo"it does have value";
    }else{
        echo "it is empty";
    }
    vice versa in using empty 
?>



7. Difference between include and require.  
>




8. What is a session in PHP?  
>it is use to store user information and it can be used on different pages of the site, sometimes a session can be use when you login a page

'''php
<?php 
    session_start(); /starts a session
    session_unset(); /remove session variable
    session_destroy(); /delete a session

?>

9. What is GET vs POST?  
>get is fetching the data, Post is submiting the data

10. How do you connect PHP to MySQL?  
>by using PDO or MySQLi

'''php 

<?php 
    $server_name = "servername";
    $username = "root";
    $password = "password";
    $database = "database name";

    $conn = mysqli(the 4 variables in the top)

    //check connection

?>


**Coding Questions**
1. Write a function to reverse a string.  
'''php
<?php 
    //strrev function
    function reverse($str){
        return strrev($str);
    }

    function rev($str){
        $reverse= "" ;
        for($i = strlen($str) - 1; $i >= 0; $i--){
            $reverse .= $str[i];
        }
        return $reverse;
    }

?>





2. Write a function to check if a number is even or odd. 
'''php
<?php 

    function isEven($num){
        if($num % 2 === 0){
            return "the number is even";
        }else{
            return "the number is odd";
        }
    }
    //ternary operation 
    function isEven($num){
        return ($num % 2 === 0) ? "The number is even" : "The number is odd";
    }

?>





3. Create a script that prints Fibonacci numbers.  
'''php

<?php 
    function fib($num){
        $num1 = 0;
        $num2 = 1;


        for($i = 0; $i < $number; $i++ ){
            $nect = $num1 + $num2;
            $num1 = $num2;
            $num2 = $next;
        }
    }

?>





4. Write a script to sum an array.  
5. Create a function that finds the max number in an array.  
6. Write a function to check if a string is a palindrome.  
7. Print multiplication table of 5.  
8. Write a function to count vowels in a string.  
9. Connect to MySQL and fetch rows.  
10. Write a function that swaps two variables.  

---

## Junior
**Interview Questions**
1. What are PHP Traits?  
2. Difference between abstract classes and interfaces?  
3. How do you upload files in PHP?  
>by using the enctype="multipart/form-data"

example code
'''php 
<?php 

<form action="" method="POST" enctype="multipart/form-data" >
<input type="file" name="in_file">
 <button type="submit" name="submit">Upload</button>
</form>


    //check request method 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['in_file']) && $_FILES['in_file']['error'] === UPLOAD_ERR_OK){
            //get the file path 
            //get the file name
            //get the directory of the folder //the destination of where the file will be uploaded
        

            //validate and sanitize the file if you want only .png, .jpeg, .gif, note: you can alsolimit the file size 

            move_uploaded_file()

            //return succesfully uploaded or not 
        }
    }


?>





4. What are magic constants?  
5. Difference between include_once and require_once.  
6. What is a constructor in PHP?  

7. How do you prevent SQL injection?  
> by sanitizing and validating the input fields, sanitation can be done in both front end and backend, use prepared statement for queries  


8. What are prepared statements?  
>it protects queries safely by seperating sql code from user input, example code: $stmt = $conn->prepare(VALUES(?, ?)); $stmt->bind_params("ss")

9. What is explode() vs implode()?  
>explode splits a string 
>implode joins an element

10. How do you handle errors in PHP?
>by using a try catch exception   

**Coding Questions**
1. Write a function to check prime numbers.  
2. Build a script to read JSON file contents.  
3. Implement file upload script.  
4. Write a class with a constructor and destructor.  
5. Write a script to sort an array.  
6. Create a login form handler.  
7. Write a function to calculate factorial.  
8. Write a function that reverses an array.  
9. Create a script to connect and insert into a DB.  
10. Write a function to generate random password.  

---