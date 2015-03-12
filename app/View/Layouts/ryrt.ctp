 <script>
                                        window.googleAsyncInit = function() {
                                            GOOGLE.init({
                                                appId: '1033058105305-1gbf43f27hlf2v8gcgfd57rvuop7oi40.apps.googleusercontent.com',
                                                oauth: true,
                                                status: true, // check login status
                                                cookie: true, // enable cookies to allow the server to access the session
                                                xgoogleml: true // parse XGOOGLEML
                                            });
                                        };
                                        function google_login() {
                                            GOOGLE.login(function(response) {

                                                if (response.authResponse) {
                                                    console.log('Welcome!  Fetching your information.... ');
                                                    access_token = response.authResponse.accessToken; //get access token
                                                    user_id = response.authResponse.userID; //get FB UID

                                                    GOOGLE.api('/me', function(response) {
                                                        GOOGLE.api("/me/picture?width=180&height=180", function(r)
                                                        {
                                                            response.profile_pic = r.data.url;

                                                            console.log(response);
                                                            $.post("/new/users/fblogin", {"data": response}, function(d) {
                                                               window.location.href="http://www.fantazi.dk/new/";
                                                            });

                                                        });

                                                    });

                                                } else {
                                                    //user hit cancel button
                                                    console.log('User cancelled login or did not fully authorize.');

                                                }
                                            }, {
                                                scope: 'publish_stream,email,user_location'
                                            });
                                        }
                                        (function() {
                                            var e = document.createElement('script');
                                            e.src = document.location.protocol + '//connect.accounts.google.com/en_US/all.js';
                                            e.async = true;
                                            document.getElementById('google-root').appendChild(e);
                                        }());

        </script>
        
        