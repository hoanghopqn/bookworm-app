import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import "./style.scss";
import { Card, ListGroup, ListGroupItem } from "reactstrap";

export default function FindCard(props) {
    const { cardb } = props;
    const { book_cover_photo, author_name, book_title, book_summary,book_price,discount_price } = cardb;

    const urlimage = book_cover_photo ? `images/${book_cover_photo}.jpg` : 'images/default-image.jpg' 
    const styleprice = discount_price ? 'style-price'  : 'discount';  
    const stylediscount = discount_price ? 'discount' : 'discount_price' ;  
    return (
        <div className="Single-cardbook">
            <div className="main-cardbook">
                <div className="header-cardbook">
                    <div className="image-cardbook">
                    <img alt="Card" src={urlimage} />
                    </div>
                    <div className="author-cardbook">
                        <a>{author_name}</a>
                    </div>
                </div>
                <div className="body-cardbook">
                    <div className="cardbook-title">
                        <a>{book_title}</a>
                    </div>
                    <div className="cardbook-text">
                        <a>{book_summary}</a> 
                    </div>
                </div>
            </div>
            <div className="price-cardbook">
            <Card>
                <ListGroup flush>
                    <ListGroupItem className="price">
                        <a className={styleprice}>{"$" + book_price}</a>
                        <a className={stylediscount}>{"$" + discount_price}</a>
                    </ListGroupItem>
                </ListGroup> </Card>
            </div>
        </div>
    );
}
