<section>
    <div class="breadcrumb">
        <div class="fix">
            <ul>
                <li>
                    <a href="">
                        <img src="public/default/img/icon/home.png" alt=" " />
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a>
                        <span>Sign in</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="content-page">
        <div class="fix">
            <div class="title-page">
                <span>Sign In</span>
            </div>
            <div class="clr20"></div>
            <div class="sign-in-page">
                <div class="box-sign-in f-l">
                    <div class="title-box">
                        <span>Sign In</span>
                    </div>
                    <form action="sign-in/validate" method="post">
                    <div class="form-sign">
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Email</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="email" required="" name="email" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Password</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="password" required="" name="password" />
                            </div>
                        </div>
                        <div class="button-form-sign">
                            <button>Sign In</button>
                        </div>
                    </div>
                    </form>
                    <div class="clr15"></div>
                    <div class="login-fb">
                        <a href="sign-in-with-facebook">
                            <div class="icon-fb f-l">
                                <img src="public/default/img/icon/fb-text.png" alt=" " />
                            </div>
                            <div class="text-fb f-l">
                                <span>Sign in with Facebook</span>
                            </div>
                            <div class="clr"></div>
                        </a>
                    </div>
                </div>
                <div class="box-sign-up f-r">
                    <div class="title-box">
                        <span>Sign Up</span>
                    </div>
                    <form action="sign-up" method="post">
                    <div class="form-sign">
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Email</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="email" required="" name="email" value="<?php echo $this->session->userdata('signUpEmail') ?>" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Password</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="password" required="" name="password" value="<?php echo $this->session->userdata('signUpPassword') ?>" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Confirm Password</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="password" required="" name="password2" value="<?php echo $this->session->userdata('signUpPassword2') ?>" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Name</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="text" required="" name="name" value="<?php echo $this->session->userdata('signUpName') ?>" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="text-form-sign">
                                <span>Address</span>
                            </div>
                            <div class="clr5"></div>
                            <div class="input-form-sign">
                                <input type="text" required="" name="address" value="<?php echo $this->session->userdata('signUpAddress') ?>" />
                            </div>
                        </div>
                        <div class="item-form-sign">
                            <div class="item-form-sign-small f-l">
                                <div class="text-form-sign">
                                    <span>Birthday</span>
                                </div>
                                <div class="clr5"></div>
                                <div class="input-form-sign">
                                    <input type="text" required="" class="date-picker" name="birthday" value="<?php echo $this->session->userdata('signUpAddress') ?>" />
                                </div>
                            </div>
                            <div class="item-form-sign-small f-r">
                                <div class="text-form-sign">
                                    <span>Sex</span>
                                </div>
                                <div class="clr5"></div>
                                <div class="input-form-sign">
                                    <select name="sex">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="button-form-sign">
                            <button>Sign Up</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="clr20"></div>
            </div>
        </div>
    </div>
    <div class="clr20"></div>
</section>