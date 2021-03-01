/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

// start the Stimulus application

import React, {Component} from "react";
import ReactDOM from 'react-dom';


//Mes components..
import Menu from './Components/Menu';
import ProjectCard from "./Components/ProjectCard";


class App extends Component
{
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            Category : 'Site',
            Projects : []
        };
    }

    handleClick = (event) => {
        const Cat = event.target.parentElement.className.split(' ');

        this.setState({ Category : Cat[0]}, () => {
            this.fetchApi();
        });
    }
    //End handleClick.......................................................................

    //Pour récuperer les projets en fonction de la category...
    fetchApi = () => {

        fetch("http://localhost:8000/api/"+this.state.Category)
            .then(res => res.json() )
            .then(
                (result) => {
                    console.log(result);
                    this.setState({
                        isLoaded: true,
                        Projects: result
                    });
                },
                (error) => {
                    this.setState({
                        isLoaded: true,
                        error
                    });
                }
            )
    }
    //End fecthApi...........................................................


    componentDidMount() {
        this.fetchApi();
    }

    //.....................................................................
    render() {
        const { error, isLoaded, Projects} = this.state;

        if (error) {
            return <div>Erreur : {error.message}</div>;
        } else if (!isLoaded) {
            return <div>Chargement…</div>;
        } else {
            return (

                <div className="App">

                    <Menu MenuClick = {this.handleClick} Category={this.state.Category} />
                    <div className="ProjectsList">
                        {
                            Projects['Projects'].map((item) => {
                                return <ProjectCard Project={item} key={item}/>
                            })
                        }
                    </div>

                </div>
            );
        }
    }
    //End render().................................................

}

ReactDOM.render(<App />, document.getElementById('root') );
