import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class LatestProducts extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/products?num=6')
            .then( (response) => {
                if(response.data.data.length > 0) {

                    this.setState({data: response.data.data,httpstate:'2'})
                }else{
                    this.setState({data: response.data.data,httpstate:'1'})
                }
            })
    }




    render() {

        if (this.state.httpstate == 0){
            return ( <React.Fragment>
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
            <div className="tabs-block">
                <div className="h4 col-xs-b25">latest products</div>
                <div className="tab-entry visible">
                    <div className="row nopadding" id="products">
                        { this.state.data.map((item,index) => {


                          return  <div key={index} className="col-sm-4">
                                <div className="product-shortcode style-1">
                                    <div className="title">
                                        <div className="simple-article size-1 color col-xs-b5"><Link href="#">{item.category_name}
                                            </Link></div>
                                        <div className="h6 animate-to-green"><Link href="#">{item.title}</Link>
                                        </div>
                                    </div>
                                    <div className="preview">
                                        <img src={item.image} alt="" className="img-responsive"/>
                                        <div className="preview-buttons valign-middle">
                                            <div className="valign-middle-content">
                                                <Link className="button size-2 style-2" href="productdetail.html">
                                                            <span className="button-wrapper">
                                                                <span className="icon"><img src="img/icon-1.png"
                                                                                            alt=""/></span>
                                                                <span className="text">Learn More</span>
                                                            </span>
                                                </Link>
                                                <Link className="button size-2 style-3" href="#">
                                                            <span className="button-wrapper">
                                                                <span className="icon"><img src="img/icon-3.png"
                                                                                            alt=""/></span>
                                                                <span className="text">Add To Cart</span>
                                                            </span>
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="price">
                                        <div className="simple-article size-4 dark">${item.price}.00</div>
                                    </div>
                                    <div className="description">
                                        <div className="simple-article text size-2">{item.description.slice(0,70)+"..."}
                                        </div>
                                        <div className="icons">
                                            <Link className="entry"><i className="fa fa-shopping-cart"
                                                                       aria-hidden="true"></i></Link>
                                            <Link className="entry open-popup" data-rel="3"><i className="fa fa-eye"
                                                                                               aria-hidden="true"></i></Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        })

                        }
                    </div>
                    </div>
                    </div>

                <div className="empty-space col-xs-b35 col-md-b70"></div>

            </React.Fragment>

        )}

         if(this.state.httpstate == 1) {
             return (  <React.Fragment>
                 <div className="alert alert-warning">
                     No product found
                 </div>
                 <div className="empty-space col-xs-b35 col-md-b70"></div>
             </React.Fragment>

             )
         }
    }
}

export default LatestProducts;



