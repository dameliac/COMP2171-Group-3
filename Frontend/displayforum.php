<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../js/forum.js" ></script>
</head>
<body>
    <div class="container">
        <div class="top">
            <img src="logo.png" alt="Yellow box" class="yellow">
            <ul>
                <li class="topWords">UniFresh</li>
                <li class="topWords">Laundry Xpress</li>
            </ul>
        </div> <!---end of top div-->

        <div class="leftSide">
            <div class="set">
                <p><a href=""> <i class="fas fa-home" class="yellow1"></i>  Home</a></p>
            </div>
            <div class="set">
                <p><a href=""> <i class="fas fa-bookmark" class="yellow1"></i>  Bookmark</a></p>
            </div>
            <div class="set">
                <p> <i class="fas fa-folder" class="yellow1"></i>  Categories</p>
            </div>
        </div> <!--end of leftSide div-->

        <div class="rightCenter">
            <div class="center">
                <form action="../Backend/post.php" method="post">
                    <div class="formData">
                        <input type="text" id="thread" placeholder="Add a new thread..." name="threadNew">
                        <button type="button" id="btn">+</button>
                    </div> <!--end of formData div-->
                </form> <!--end of first child for center-->
                <div class="messageSec" id="popup">
                    <!-- Pop-up content goes here -->
                    <div class="container2">
                        <h2>Forum Message Form</h2>
                        <form action="../Backend/forum.php" method="post">
                            <label for="title">Subject:</label>
                            <input type="text" id="title" name="title"><br>
                            <label>
                                <input type="checkbox" id="highPriority" name="highPriority"> Is this a high priority message?
                            </label><br>
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" style="font-weight:normal;" requ></textarea>
                            <!-- Buttons for text formatting -->
                            <div class="bui">
                            <button type="button" id="boldBtn"><b>B</b></button>
                            <button type="button" id="italicBtn"><i>I</i></button>
                            <button type="button" id="underlineBtn"><u>U</u></button><br><br> 
                            </div>      
                            <div class="cpParent">
                                <button type="button" id="btn1">Go Back</button>
                                <div class="cp">
                                    <button type="button" id="btn2">Clear All</button>
                                    <button type="button" id="btn3">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!--end of messageSec div-->
            </div> <!--end of center div-->

            <div class="right">
                <h4>FORUM MESSAGES</h4>
                <ul>
                    <li>Message Title</li>
                    <li>Message Title</li>
                    <li>Message Title</li>
                    <li>Message Title</li>
                    <li>Message Title</li>
                </ul>
            </div> <!--end of right div-->
        </div> <!--end of rightCenter-->
    </div> <!--end of container-->

    <!-- Place your JavaScript code here -->
    <div id="backdrop"></div>
    <footer class="footer">
    <div style="text-align: center;">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; UniFresh Laundry Xpress 2024. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer> 
</body>
</html>
