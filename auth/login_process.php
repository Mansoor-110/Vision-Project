<?php
session_start();

if ( isset( $_POST[ 'submit' ] ) ) {
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    include'../includes/connection.php';
    $query = "select * from user_acc where email='$email'";
    $sql = mysqli_query( $conn, $query );
    $data = mysqli_fetch_assoc( $sql );
    $welcome_name = $data[ 'name' ];
    $_SESSION[ 'user_id' ] = $data[ 'id' ];

    $total = mysqli_num_rows( $sql );
    if ( $total>0 ) {
        if ( $data[ 'password' ] === $password ) {
            $_SESSION[ 'login_success' ] = 'login_success';
            $_SESSION[ 'welcome' ] = "$welcome_name" ;
            header( 'location:../pages/index.php' );
        } else {
            $_SESSION[ 'status' ] = 'Incorrect Password or Email';
            header( 'location:login.php' );
        }
    } else {
        $_SESSION[ 'status' ] = 'Account does not exist';
        header( 'location:login.php' );
    }
}

?>