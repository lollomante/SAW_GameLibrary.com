<?php 
session_start();
require_once 'process/access_control.php';
require_once 'process/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Therms and Conditions</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/search_bar.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <link rel="stylesheet" type="text/css" href="style/therms.css" />
</head>
<body class="body">
    <?php include "navbar.php";?> 
    <div class="main">
        <p class="gentext"> Terms and Conditions for <span> <a class="link" href="index.php"> GameLibrary.com </a> </span> </p></p>
        <p class="gentext"> Effective Date: 01/11/2023 </p>
        <p class="gentext"> To use <span> <a class = "link" href="index.php"> GameLibrary.com</a> </span> you have to agree to these Terms and Conditions. 
            By accessing or using the Website, you agree to be bound by these Terms. 
            If you do not agree with these Terms, please do not use the Website.</p>
        <ol>
            <li>
                <p class = "paratitle">Acceptance of Terms</p>
                <p class="gentext">
                    By using the Website, you agree to comply with and be bound by these Terms and any additional terms, 
                    conditions, or policies that may be provided on the Website. If you do not agree with these Terms, you should not use the Website. 
                </p>
            </li>
            <li>
                <p class = "paratitle"> Use of the Website </p>
                <ul>
                    <li class="gentext">You must be at least 13 years old to use the Website. If you are under 13, you may only use the Website with the consent of a parent or legal guardian.</li>
                    <li class="gentext">You are responsible for any content you post on the Website, and it must not violate any applicable laws or infringe upon the rights of others.</li>
                    <li class="gentext">You must not use the Website in any way that could damage, disable, overburden, or impair the Website, its servers, or networks.</li>
                    <li class="gentext">You are responsible for maintaining the confidentiality of your account and password and for restricting access to your account. You agree to accept responsibility for all activities that occur under your account.</li>
                </ul>
            </li>
            <li>
                <P class = "paratitle">Intellectual Property</p>
                <ul>
                    <li class="gentext">The Website and all of its content, including but not limited to text, graphics, logos, and images, are the intellectual property of the Company and protected by copyright, trademark, and other laws.</li>
                    <li class="gentext">You may not reproduce, distribute, or display any part of the Website or its content without prior written permission from the Company.</li>
                    <li class="gentext">Third-party images, videos and trademarks belong to the respective owners </li>
                </ul>
            </li>
            <li>
                <P class = "paratitle"> User Content </p>
                <ul>
                    <li class="gentext">By submitting content to the Website, you grant the Company a worldwide, royalty-free, non-exclusive license to use, reproduce, modify, distribute, and display the content.</li>
                    <li class="gentext">You are solely responsible for your user content and its accuracy. The Company is not responsible for any user content posted on the Website by you or others.</li>
                </ul>
            </li>
            <li>
                <P class = "paratitle"> Third-Party Links </p>
                <ul>
                    <li class="gentext">The Website may contain links to third-party websites. These links are provided for your convenience. The Company has no control over the content or policies of these third-party websites and is not responsible for them.</li>
                </ul> 
            </li> 
            <li>
                <P class = "paratitle"> Disclaimer </p>
                <ul>
                    <li class="gentext">The Website is provided "as is" and "as available" without any warranties. The Company makes no representations or warranties of any kind, whether express or implied, regarding the Website or its content.</li>
                </ul>
            </li>
            <li>
                <P class = "paratitle"> Limitation of Liability </p>
                <ul>
                    <li class="gentext">To the extent permitted by law, the Company shall not be liable for any direct, indirect, incidental, special, or consequential damages arising from your use of the Website.</li>
                </ul>
            </li>
            <li>
                <P class = "paratitle"> Changes to Terms </p>
                <ul>
                    <li class="gentext">The Company may revise these Terms at any time by updating this page. It is your responsibility to check this page periodically for changes. Your continued use of the Website after any changes indicate your acceptance of the revised Terms.</li>
                </ul>
            </li>
        </ol>
    </div>
    <br><br><br><br><br>
    <?php include "footer.php";?>
    <!--made on earth by humans-->
</body>
</html>

