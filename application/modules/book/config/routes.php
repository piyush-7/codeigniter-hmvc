<?php
//Routes for all Book module

//book -> test msg method
$route["book/test"] = "book/test_msg";




//migration for module book table (tbl_books)
$route["book/migration"] = "book/run_migration";

//book -> (view)
$route["book/bookview"] = "book/create_book";

//book -> submit view

$route["book/submit"] = "book/submit_book";

//book -> all books list
$route["book/list-book"] = "book/list_book";






?>