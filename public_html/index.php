<?php
    require_once('util.php');
    if(isLogged()) exit(header('location: home.php'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="jumbotron text-justify">
                <h1 class="text-center">Welcome to Online Tar System</h1>
                <p class="lead mt-3">
                How it works?
                <ul class="list-unstyled ">
                    <li>1 - Create your personal folder (a subdirectory of /upload/users/)</li>
                    <li>2 - You can upload what you want (max 256KB/file) inside your personal folder</li>
                    <li>3 - Wait 5 minutes: our automatic system will make a Tar of your files ("<i>tar cf archive.tar *</i>"). Check often by updating your files list.</li>
                    <li>4 - Download your Tar ASAP: to prevent abuses, we often delete personal folders of all users!<br>
                    (We could mistakenly delete all files before making the tar, but hey: this is a free service. Try again if it happens.)</li>
                </ul>
                </p>
                <hr class="my-4">
                <div class="container text-center">
                    <h3>Create your workspace now</h3>
                    <a href="/createWorkspace.php" class="btn btn-success btn-lg mt-2 text-uppercase">Create</a>
                </div>
            </div>
        </div>
    </div>
    <!--
        TODOLIST:
        - Remember to protect (encrypt?) the hidden file ".flag" inside /upload/ folder.
        For now I have temporarily added a rule to the firewall to make it unreachable from the internet.
     -->
</body>
</html>
