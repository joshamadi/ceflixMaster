import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class Sponsored extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/sponsored?num=3')
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


                            <div className="tabs-block">
                                <div className="row">
                                <div className="col-lg-4 col-xs-b15 col-lg-b0">
                                <div className="h4">Sponsored Products</div>
                            </div>
                            </div>

                            <div className="empty-space col-xs-b15 col-sm-b30"></div>
                                <div className="tab-entry visible">
                                <div className="row nopadding">


                                    { this.state.data.map((item,index) => {

                                           return    <div key={index} className="col-sm-4">
                                               <div className="product-shortcode style-1">
                                                   <div className="title">
                                                       <div className="simple-article size-1 color col-xs-b5"><Link to="/#">{item.category_name}</Link></div>
                                                       <div className="h6 animate-to-green"><Link to="/#">{item.product_title}</Link>
                                                       </div>
                                                   </div>
                                                   <div className="preview">
                                                       <img src={item.image} alt="" />
                                                       <div className="preview-buttons valign-middle">
                                                           <div className="valign-middle-content">
                                                               <Link className="button size-2 style-2" to="/productdetail.html">
                                                            <span className="button-wrapper">
                                                                <span className="icon"><img src="/img/icon-1.png"
                                                                                            alt=""/></span>
                                                                <span className="text">Learn More</span>
                                                            </span>
                                                               </Link>
                                                               <Link className="button size-2 style-3" to="/#">
                                                            <span className="button-wrapper">
                                                                <span className="icon"><img src="/img/icon-3.png"
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
                                                       <div className="simple-article text size-2">{item.description}</div>
                                                       <div className="icons">
                                                           <Link className="entry"><i className="fa fa-shopping-cart" aria-hidden="true"></i></Link>
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

export default Sponsored;



