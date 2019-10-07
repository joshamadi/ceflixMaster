import React, { Component } from 'react';
import {Link} from 'react-router-dom';

const Footer = () => {

    return   <footer>
        <div className="container">
            <div className="footer-top">
                <div className="row">
                    <div className="col-sm-6 col-md-6 col-xs-b30 col-md-b0">
                        <img src="/img/ceflix2.png" alt="" />
                        <div className="empty-space col-xs-b20"></div>
                        <div className="simple-article size-2 light fulltransparent">Integer posuere orci sit amet
                            feugiat pellent que. Suspendisse vel tempor justo, sit amet posuere orci dapibus auctor
                        </div>
                        <div className="empty-space col-xs-b20"></div>
                        <div className="footer-contact"><i className="fa fa-mobile" aria-hidden="true"></i> contact us: <Link
                            to="/tel:+35235551238745">+3 (523) 555 123 8745</Link></div>
                        <div className="footer-contact"><i className="fa fa-envelope-o" aria-hidden="true"></i> email: <Link
                            to="/mailto:office@exzo.com">office@exzo.com</Link></div>
                        <div className="footer-contact"><i className="fa fa-map-marker" aria-hidden="true"></i> address: <Link
                            to="/#">1st, new york, usa</Link></div>
                    </div>
                    <div className="col-sm-6 col-md-6 col-xs-b30 col-md-b0">
                        <h6 className="h6 light">Quick links</h6>
                        <div className="empty-space col-xs-b20"></div>
                        <div className="footer-column-links">
                            <div className="row">
                                <div className="col-xs-6">
                                    <Link to="/#">home</Link>
                                    <Link to="/#">about us</Link>
                                    <Link to="/#">products</Link>
                                    <Link to="/#">services</Link>
                                    <Link to="/#">blog</Link>
                                    <Link to="/#">gallery</Link>
                                    <Link to="/#">contact</Link>
                                </div>
                                <div className="col-xs-6">
                                    <Link to="/#">privacy policy</Link>
                                    <Link to="/#">warranty</Link>
                                    <Link to="/#">login</Link>
                                    <Link to="/#">registration</Link>
                                    <Link to="/#">delivery</Link>
                                    <Link to="/#">pages</Link>
                                    <Link to="/#">our stores</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="clear visible-sm"></div>
                </div>
            </div>
            <div className="footer-bottom">
                <div className="row">
                    <div className="col-lg-8 col-xs-text-center col-lg-text-left col-xs-b20 col-lg-b0">
                        <div className="copyright">&copy; 2015 All rights reserved. Development by <Link
                            to="" target="_blank">UnionAgency</Link></div>
                        <div className="follow">
                            <Link className="entry" to="/#"><i className="fa fa-facebook"></i></Link>
                            <Link className="entry" to="/#"><i className="fa fa-twitter"></i></Link>
                            <Link className="entry" to="/#"><i className="fa fa-linkedin"></i></Link>
                            <Link className="entry" to="/#"><i className="fa fa-google-plus"></i></Link>
                            <Link className="entry" to="/#"><i className="fa fa-pinterest-p"></i></Link>
                        </div>
                    </div>
                    <div className="col-lg-4 col-xs-text-center col-lg-text-right">
                        <div className="footer-payment-icons">
                            <Link className="entry"><img src="/img/thumbnail-4.jpg" alt="" /></Link>
                            <Link className="entry"><img src="/img/thumbnail-5.jpg" alt="" /></Link>
                            <Link className="entry"><img src="/img/thumbnail-6.jpg" alt="" /></Link>
                            <Link className="entry"><img src="/img/thumbnail-7.jpg" alt="" /></Link>
                            <Link className="entry"><img src="/img/thumbnail-8.jpg" alt="" /></Link>
                            <Link className="entry"><img src="/img/thumbnail-9.jpg" alt="" /></Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
}




export default Footer;



