import React, { useEffect, useState } from "react";
import Checkbox from "@material-ui/core/Checkbox";
import CardBook from "../CardBook";
import * as bookServices from "../../apiServices/bookServices";
import "./Product.scss";
import { isNull } from "lodash";
import { Pagination, PaginationItem, PaginationLink } from "reactstrap";
export default function ProductComponent(props) {
    const [selectsorts, setSelectsSorts] = useState();
    const [selectShow, setSelectShow] = useState();
    const [selectRating, setSelectRating] = useState();
    const [urllsort, setUrlsort] = useState("get-book-sale?sort=asc");
    const [urllrating, setUrlrating] = useState(null);
    const [urllshow, setUrlshow] = useState("15");
    const [urll, setUrl] = useState("get-book-sale?sort=asc&&limit=15");
    const [CardShop, setCardShop] = useState([]);
    const [Category, setCategory] = useState([]);
    const [selectCategory, setSelectCategory] = useState([]);
    const [Author, setAuthor] = useState([]);
    const [selectAuthor, setSelectAuthor] = useState([]);
    useEffect(() => {
        if (selectsorts === "sale") {
            setUrlsort("get-book-sale?sort=asc");
        } else if (selectsorts === "popular") {
            setUrlsort("get-popular?sort=asc");
        } else if (selectsorts === "high") {
            setUrlsort("get-books-all?sort=asc");
        } else if (selectsorts === "low") {
            setUrlsort("get-books-all?sort=desc");
        }
        if (selectShow === "15") {
            setUrlshow("15");
        } else if (selectShow === "20") {
            setUrlshow("20");
        } else if (selectShow === "25") {
            setUrlshow("25");
        } else if (selectShow === "30") {
            setUrlshow("30");
        }
        // let star=`&&star=${selectRating}`;
        // setUrlrating = selectRating ? star : '' ;
        if (selectRating === 1) {
            setUrlrating("&&star=" + selectRating);
        } else if (selectRating === 2) {
            setUrlrating("&&star=" + selectRating);
        } else if (selectRating === 3) {
            setUrlrating("&&star=" + selectRating);
        } else if (selectRating === 4) {
            setUrlrating("&&star=" + selectRating);
        } else if (selectRating === 5) {
            setUrlrating("&&star=" + selectRating);
        } else {
            setUrlrating("");
        }

        setUrl(urllsort + "&&limit=" + urllshow);
    });
    useEffect(() => {
        const getCardShop = async () => {
            const results = await bookServices.getListBooks(urll);
            setCardShop(results.book);
        };
        getCardShop();
    }, [urll]);
    useEffect(() => {
        const getCategory = async () => {
            const results = await bookServices.getListBooks(
                "get-author-category"
            );
            setAuthor(results.author);
            setCategory(results.category);
        };
        getCategory();
    });
    const slides = CardShop.map((book, index) => {
        return (
            <div key={index} className="single-product">
                <CardBook detailBook={book} />
            </div>
        );
    });
    const category = Category.map((item, index) => {
        return (
            <div className="single-Checkbox">
                <div key={index} className="single-Checkbox">
                    <Checkbox />
                    <a>{item.category_name}</a>
                </div>
            </div>
        );
    });
    const author = Author.map((item, index) => {
        return (
            <div className="single-Checkbox">
                <div key={index} className="single-Checkbox">
                    <Checkbox />
                    <a>{item.author_name}</a>
                </div>
            </div>
        );
    });
    return (
        <div className="Main-Product">
            <div className="title-book">
                <a>Book</a>
            </div>
            <div className="Main-container">
                <div className="book-fillter">
                    <a className="fillter">fillter</a>
                    <a className="showing">
                        Showing {1}- {urllshow} of 126
                    </a>
                    <div className="select">
                        <select
                            value={selectsorts}
                            onChange={(e) => setSelectsSorts(e.target.value)}
                            className="select-sort"
                        >
                            <option value={"sale"}>sort by on sale</option>
                            <option value={"popular"}>sort by popular</option>
                            <option value={"high"}>
                                sort by price:low to high
                            </option>
                            <option value={"low"}>
                                sort by price:high to low
                            </option>
                        </select>
                        <select
                            value={selectShow}
                            onChange={(e) => setSelectShow(e.target.value)}
                            className="select-show"
                        >
                            <option value={15}>15</option>
                            <option value={20}>20</option>
                            <option value={25}>25</option>
                            <option value={30}>30</option>
                        </select>
                    </div>
                </div>
                <div className="Product-container">
                    <div className="Checkbox-container">
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Category</a>
                            {category}
                        </div>
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Author</a>
                            {author}
                        </div>
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Rating</a>
                            <div className="single-Checkbox">
                                <Checkbox
                                    value={1}
                                    onChange={(e) => setSelectRating(1)}
                                />
                                <a>1</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox
                                    onChange={(e) => setSelectRating(2)}
                                />
                                <a>2</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox
                                    onChange={(e) => setSelectRating(3)}
                                />
                                <a>3</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox
                                    onChange={(e) => setSelectRating(4)}
                                />
                                <a>4</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox
                                    onChange={(e) => setSelectRating(5)}
                                />
                                <a>5</a>
                            </div>
                        </div>
                    </div>
                    <div className="feature-product">{slides}</div>
                </div>
            </div>
        </div>
    );
}
