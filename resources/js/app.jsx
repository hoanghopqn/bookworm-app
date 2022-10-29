import React from "react";
import ReactDOM from "react-dom";
import { Header } from "./components/Header";
import { Final } from "./components/Final";
import { Banner } from "./components/home/Banner"; 
import { Feature } from "./components/home/feature/Feature"; 
 
import { Home } from "./pages/Home";
import { Shop } from "./pages/Shop"; 
import './style.scss';

ReactDOM.render(
    <>  
    < Header />
    < Banner />
    < Feature />
    < Final />
    </>,
    document.getElementById("root")
);
