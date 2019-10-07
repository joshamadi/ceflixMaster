import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class PromoProducts extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/promo-products')
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
                <div className="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1"
                     data-sm-slides="2" data-md-slides="2" data-lt-slides="2" data-slides-per-view="2">
                    <div className="h4 swiper-title">Promo Offers</div>
                    <div className="empty-space col-xs-b20"></div>
                    <div className="swiper-button-prev style-1"></div>
                    <div className="swiper-button-next style-1"></div>
                    <div className="swiper-wrapper">







                                    { this.state.data.map((item,index) => {

                                           return  <div className="swiper-slide">
                                               <div className="product-shortcode style-3">
                                                   <div className="simple-article size-5 grey col-xs-b20">BEST PRICE: <span
                                                       className="color">${item.price}.00</span></div>
                                                   <div className="products-line col-xs-b25">
                                                       <div className="line col-xs-b10">
                                                           <div className="fill" style={{width: "100%"}}></div>
                                                       </div>
                                                   </div>
                                                   <div className="swiper-container" data-loop="1" data-touch="0">
                                                       <div className="swiper-button-prev style-1"></div>
                                                       <div className="swiper-button-next style-1"></div>
                                                       <div className="swiper-wrapper">
                                                           <div className="swiper-slide">
                                                               <img src={item.image} alt="" />
                                                           </div>
                                                           {
                                                                item.product_images.map((item)=> {

                                                                    return  <div className="swiper-slide">
                                                                        <img src={item.path} alt="" />
                                                                    </div>
                                                                })
                                                           }

                                                       </div>
                                                   </div>
                                                   <div className="empty-space col-xs-b20"></div>
                                                   <div className="h6 animate-to-green"><Link to="/#">{item.product_title}</Link></div>
                                                   <div className="empty-space col-xs-b10"></div>
                                                   <div className="description">
                                                       <div className="simple-article size-2">{item.description}</div>
                                                   </div>
                                                   <div className="empty-space col-xs-b20"></div>
                                                   <div className="countdown-wrapper">
                                                       <div className="countdown" data-end={item.end_date}></div>
                                                   </div>
                                                   <div className="preview-buttons">
                                                       <div className="buttons-wrapper">
                                                           <Link className="button size-2 style-2" to="/#">
                                                    <span className="button-wrapper">
                                                        <span className="icon"><img src="/img/icon-1.png" alt=""/></span>
                                                        <span className="text">Learn More</span>
                                                    </span>
                                                           </Link>
                                                           <Link className="button size-2 style-3" to="/#">
                                                    <span className="button-wrapper">
                                                        <span className="icon"><img src="/img/icon-3.png" alt=""/></span>
                                                        <span className="text">Add To Cart</span>
                                                    </span>
                                                           </Link>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                        })

                                    }
                    </div>
                    <div className="swiper-pagination relative-pagination visible-xs"></div>
                </div>

                <div className="empty-space col-xs-b35 col-md-b70"></div>

            </React.Fragment>



        )}

         if(this.state.httpstate == 1) {
             return (
                 <div className="alert alert-warning">
                     No product found
                 </div>
             )
         }
    }
}

export default PromoProducts;



