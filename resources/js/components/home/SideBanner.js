import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class SideBanner extends  Component{
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
                <div className="col-sm-6 col-md-12">
                        <div className="swiper-container banner-shortcode style-2">

                                <div className="swiper-button-prev hidden"></div>
                                <div className="swiper-button-next hidden"></div>
                                <div className="swiper-wrapper">

                                    { this.state.data.map((item,index) => {

                                           return <div key={index} className="swiper-slide">
                                                    <div className="banner-shortcode style-2">
                                                        <div className="content">
                                                            <div className="background"
                                                                 style={{"backgroundImage": "url("+item.image+")"}}></div>
                                                            <div className="description valign-middle">
                                                                <div className="valign-middle-content">
                                                                    <div className="simple-article size-1 color"><Link
                                                                        to="/#"></Link></div>
                                                                    <div className="h4 light"><Link to="/#"></Link>
                                                                    </div>
                                                                    <div className="banner-title color"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        })

                                    }

                                </div>
                                <div className="swiper-pagination"></div>
                            </div>

                            <div className="empty-space col-xs-b25 col-sm-b50"></div>
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

export default SideBanner;



