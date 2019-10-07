import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class HomeSliders extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/home-sliders')
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






                <div className="slider-wrapper">
                    <div className="swiper-button-prev visible-lg"></div>
                    <div className="swiper-button-next visible-lg"></div>
                    <div className="swiper-container" data-parallax="1" data-auto-height="1">
                        <div className="swiper-wrapper">


                            { this.state.data.map((item,index) => {
""
                                           return  <div key={index} className="swiper-slide" style={{backgroundImage: "url("+item.image+")"}}>
                                               <div className="container">
                                                   <div className="row">
                                                       <div className="col-sm-6 col-sm-offset-6">
                                                           <div className="cell-view simple-banner-height">
                                                               <div className="col-xs-b35 col-sm-b70"></div>

                                                               <div data-swiper-parallax-x="-400">

                                                                   <div className="col-xs-b30"></div>
                                                               </div>
                                                               <div data-swiper-parallax-x="-300">
                                                                   <div className="buttons-wrapper">

                                                                   </div>
                                                               </div>
                                                               <div className="col-xs-b35 col-sm-b70"></div>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div className="slider-product-preview align-left">
                                                       <div className="product-preview-shortcode light">

                                                       </div>
                                                   </div>
                                                   <div className="empty-space col-xs-b80 col-sm-b0"></div>
                                               </div>
                                           </div>


                            })

                                    }
                        </div>
                        <div className="swiper-pagination swiper-pagination-white hidden-lg"></div>
                    </div>
                </div>

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

export default HomeSliders;



