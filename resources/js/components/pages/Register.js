/**
 * Created by imm on 08/10/2019.
 */
/**
 * Created by imm on 27/09/2019.
 */

import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';
import Footer from "../includes/Footer";
import Header from "../includes/Header";


export class Register extends React.Component {



    render() {
        return(
            <React.Fragment>
                <div id="content-block">
                    <Header/>

                        <div className="">
                            <h1>this is register</h1>
                        </div>

                    <Footer/>
                </div>

            </React.Fragment>


        )

    }
}



export default Register;