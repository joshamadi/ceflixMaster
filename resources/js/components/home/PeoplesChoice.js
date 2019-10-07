import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class PeoplesChoice extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/people-choices')
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

                <div className="swiper-container arrows-align-top">
                    <div className="h4 swiper-title">People's choice</div>

                <div className="empty-space col-xs-b20"></div>
                <div className="swiper-button-prev style-1"></div>
                <div className="swiper-button-next style-1"></div>
                <div className="swiper-wrapper">

                    { this.state.data.map((item,index) => {

                        return <React.Fragment>
                            <div className="swiper-slide">
                                <div className="banner-shortcode style-1">
                                    <div className="background" style={{backgroundImage:"url("+item.image+")"}}>
                                    </div>
                                    <div className="description valign-middle">
                                        <div className="valign-middle-content">
                                            <div className="simple-article size-3 light fulltransparent">
                                            </div>
                                            <div className="banner-title color"></div>
                                            <div className="h4 light"></div>
                                            <div className="empty-space col-xs-b25"></div>
                                            <Link className="button size-1 style-3" to="/#">
                                                            <span className="button-wrapper">
                                                                <span className="icon"><img src="/img/icon-4.png" alt=""/></span>
                                                                <span className="text">learn more</span>
                                                            </span>
                                            </Link>
                                        </div>
                                        <div className="empty-space col-xs-b60 col-sm-b0"></div>
                                    </div>
                                </div>
                            </div>
                        </React.Fragment>
                    })}
                </div>

                <div className="swiper-pagination visible-xs"></div>
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

export default PeoplesChoice;



