import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter} from 'react-router-dom';
import IndexComponent from './home/IndexComponent';
import Register from './pages/Register';



export default class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <IndexComponent/>
            </BrowserRouter>


        );
    }
}
if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
