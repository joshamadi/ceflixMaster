import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class NewsLetter extends  Component{
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
                    <div className="footer-form-block">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-5 col-xs-b10 col-lg-b0">
                                    <div className="cell-view empty-space col-lg-b50">
                                        <h3 className="h3 light">dont miss your chance</h3>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-xs-b10 col-lg-b0">
                                    <div className="cell-view empty-space col-lg-b50">
                                        <div className="simple-article size-3 light transparent">ONLY 200 PROMO CODES ON DISCOUNT!</div>
                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="single-line-form">
                                        <input className="simple-input light" type="text" value="" placeholder="Your email"/>
                                        <div className="button size-2 style-1">
                                <span className="button-wrapper">
                                    <span className="icon"><img src="/img/icon-1.png" alt=""/></span>
                                    <span className="text">submit</span>
                                </span>
                                            <input type="submit" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

export default NewsLetter;



