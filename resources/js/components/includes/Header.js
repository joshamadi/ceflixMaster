import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class Header extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/side-banners?num=3')
            .then( (response) => {


                console.log(response)
                if(response.data.data.length > 0) {

                    this.setState({data: response.data.data,httpstate:'2'})
                }else{
                    this.setState({data: response.data.data,httpstate:'1'})
                }
            })
    }




    render() {

        if (this.state.httpstate == 0){
            return (
                <React.Fragment>
                    <div align="center" className="spinner_style">
                        <i className="fa fa-spinner fa-spin fa-3x"></i> <br/>
                        ...loading....
                    </div>
                    <div className="empty-space col-xs-b35 col-md-b70"></div>
                </React.Fragment>
            )
        }

        if(this.state.httpstate == 2){
            return (


                <React.Fragment>
                    <header>
                        <div className="header-top">
                            <div className="content-margins">
                                <div className="row">
                                    <div className="col-md-5 hidden-xs hidden-sm">
                                        <div className="entry"><b>contact us:</b> <Link to="/tel:+35235551238745">+3 (523) 555 123
                                            8745</Link></div>
                                        <div className="entry"><b>email:</b> <Link to="/mailto:office@exzo.com">office@exzo.com</Link></div>
                                    </div>
                                    <div className="col-md-7 col-md-text-right">
                                        <div className="entry"><Link className="open-popup" data-rel="1"><b>login</b></Link>&nbsp; or &nbsp;<Link
                                            className="open-popup" data-rel="2"><b>register</b></Link></div>
                                        <div className="entry hidden-xs hidden-sm"><Link to="/#"><i className="fa fa-heart-o"
                                                                                                    aria-hidden="true"></i></Link></div>
                                        <div className="entry hidden-xs hidden-sm cart">
                                            <Link to="/cart.html">
                                                <b className="hidden-xs">Your bag</b>
                                                <span className="cart-icon">
                                        <i className="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <span className="cart-label">1</span>
                                    </span>
                                                <span className="cart-title hidden-xs">$1195.00</span>
                                            </Link>
                                            <div className="cart-toggle hidden-xs hidden-sm">
                                                <div className="cart-overflow">
                                                    <div className="cart-entry clearfix">
                                                        <Link className="cart-entry-thumbnail" to="/#"><img src="/img/product-1.png"
                                                                                                            alt="" /></Link>
                                                        <div className="cart-entry-description">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div className="h6"><Link to="/#">modern beat ht</Link></div>
                                                                        <div className="simple-article size-1">QUANTITY: 2</div>
                                                                    </td>
                                                                    <td>
                                                                        <div className="simple-article size-3 grey">$155.00</div>
                                                                        <div className="simple-article size-1">TOTAL: $310.00</div>
                                                                    </td>
                                                                    <td>
                                                                        <div className="cart-color" style={{background: "#eee"}}></div>
                                                                    </td>
                                                                    <td>
                                                                        <div className="button-close"></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="empty-space col-xs-b40"></div>
                                                <div className="row">
                                                    <div className="col-xs-6">
                                                        <div className="cell-view empty-space col-xs-b50">
                                                            <div className="simple-article size-5 grey">TOTAL <span
                                                                className="color">$1195.00</span></div>
                                                        </div>
                                                    </div>
                                                    <div className="col-xs-6 text-right">
                                                        <Link className="button size-2 style-3" to="/checkout1.html">
                                                <span className="button-wrapper">
                                                    <span className="icon"><img src="/img/icon-4.png" alt=""/></span>
                                                    <span className="text">proceed to checkout</span>
                                                </span>
                                                        </Link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="hamburger-icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="header-bottom">
                            <div className="content-margins">
                                <div className="row">
                                    <div className="col-xs-3 col-sm-1">
                                        <Link id="logo" to="/index.html"><img src="/img/ceflix2.png" alt="" /></Link>
                                    </div>
                                    <div className="col-xs-9 col-sm-11 text-right">
                                        <div className="nav-wrapper">
                                            <div className="nav-close-layer"></div>
                                            <nav>
                                                <ul>
                                                    <li><Link to="/products.html">Products</Link></li>
                                                    <li>
                                                        <Link to="/">Graphics Templates</Link>
                                                        <div className="menu-toggle"></div>
                                                        <ul>
                                                            <li>
                                                                <Link to="/blog3.html">Birthday Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Brochures and Magazines</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Business Cards</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Business Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Certificate Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Church Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Flyer Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Happy New Year</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Roll Up Banners</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Valentine Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Wedding Designs</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/blog3.html">Flyer Designs</Link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <Link to="/">Photos</Link>
                                                        <div className="menu-toggle"></div>
                                                        <ul>
                                                            <li>
                                                                <Link to="/#">Architecture</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Background and Texture</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Icons</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Park and Outdoors</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Pattern</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Travel</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Food and Drinks</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Health</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Nature</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Sport</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">People</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Technology</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Beauty and Fashion</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Illustration and Clip Art</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Business</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Interiors</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">ANimals and Wildlifes</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/#">Art</Link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><Link to="/credits.html">Buy Credits</Link></li>
                                                    <li><Link to="/sell.html">Sell</Link></li>
                                                    <li>
                                                        <Link to="/">Hire a Professional</Link>
                                                        <div className="menu-toggle"></div>
                                                        <ul>
                                                            <li>
                                                                <Link to="/">Photographer</Link>
                                                            </li>
                                                            <li>
                                                                <Link to="/">Designer</Link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><Link to="/contact1.html">contact us</Link></li>
                                                </ul>
                                                <div className="navigation-title">
                                                    Navigation
                                                    <div className="hamburger-icon active">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                        <div className="header-bottom-icon toggle-search"><i className="fa fa-search"
                                                                                             aria-hidden="true"></i></div>
                                        <div className="header-bottom-icon visible-rd"><i className="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <div className="header-bottom-icon visible-rd">
                                            <i className="fa fa-shopping-bag" aria-hidden="true"></i>
                                            <span className="cart-label">5</span>
                                        </div>
                                    </div>
                                </div>
                                <div className="header-search-wrapper">
                                    <div className="header-search-content">
                                        <div className="container-fluid">
                                            <div className="row">
                                                <div className="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                                    <form>
                                                        <div className="search-submit">
                                                            <i className="fa fa-search" aria-hidden="true"></i>
                                                            <input type="submit" />
                                                        </div>
                                                        <input className="simple-input style-1" type="text" value=""
                                                               placeholder="Enter keyword" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="button-close"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
                </React.Fragment>



            )}

        if(this.state.httpstate == 1) {
            return (
                <React.Fragment>
                    <div className="alert alert-warning">
                        No product found
                    </div>
                    <div className="empty-space col-xs-b35 col-md-b70"></div>
                </React.Fragment>
            )
        }
    }
}

export default Header;



