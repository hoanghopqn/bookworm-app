import React from "react";
import "bootstrap/dist/css/bootstrap.min.css"; 
import "./style.scss";

export default function FindCard() {
    return (
        <div className="SingleCard">
            <div className="header-card">
                <div className="image">
                    <img alt="Card" src="" />
                    <a>hoang</a>
                </div> 
            </div>
            <div className="body-card">
                <div className="card-title">
                    <a>hoang1</a>
                </div>
                <div className="card-text">
                    <a>hoang2</a>
                </div>
            </div>
        </div>
    );
}
