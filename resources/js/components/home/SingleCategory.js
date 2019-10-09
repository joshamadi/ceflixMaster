import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class SingleCategory extends  Component{

    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){



        axios.get('/api/categories/1')
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
                 data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="4">
                        <div className="h4 swiper-title">our single categories</div>
                        <div className="empty-space col-xs-b20"></div>
                        <div className="swiper-button-prev style-1"></div>
                        <div className="swiper-button-next style-1"></div>
                        <div class="swiper-wrapper">
                        { this.state.data.map((item,index) => {


                          return  <div key={index} class="swiper-slide">
                                <Link className="product-shortcode style-2" href="#">
                                    <span class="preview"><img src={item.image} alt="" /></span>
                                    <span class="description">
                                            <span class="h6 animate-to-green">{item.name}</span>

                                        </span>
                                </Link>
                            </div>
                            })
                        }
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

export default SingleCategory;



