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
       
        <div class="leftSide">
          <span><svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" width="20" height="20"><path d="M20,0H4A4,4,0,0,0,0,4V16a4,4,0,0,0,4,4H6.9l4.451,3.763a1,1,0,0,0,1.292,0L17.1,20H20a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0ZM7,5h5a1,1,0,0,1,0,2H7A1,1,0,0,1,7,5ZM17,15H7a1,1,0,0,1,0-2H17a1,1,0,0,1,0,2Zm0-4H7A1,1,0,0,1,7,9H17a1,1,0,0,1,0,2Z"/></svg></i> <h3>Your Threads</h3></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" height="20" viewBox="0 0 24 24" width="20" data-name="Layer 1"><path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z"/></svg><h3>Members</h3></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20">
  <path d="m23.121,6.151L17.849.878c-.567-.566-1.321-.878-2.121-.878h-7.455c-.8,0-1.554.312-2.122.879L.879,6.151c-.566.567-.879,1.32-.879,2.121v7.456c0,.801.312,1.554.879,2.121l5.272,5.273c.567.566,1.321.878,2.121.878h7.455c.8,0,1.554-.312,2.122-.879l5.271-5.272c.566-.567.879-1.32.879-2.121v-7.456c0-.801-.313-1.554-.879-2.121Zm-12.121-.151h2v7h-2v-7Zm1,12c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
</svg></i><h3>High Priority</h3></span>
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
