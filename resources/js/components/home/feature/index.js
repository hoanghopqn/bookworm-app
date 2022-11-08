import React, { useEffect, useState } from "react";
import { Tabs, Tab } from "@material-ui/core";
import "./style.scss";
import CardBook from "../../CardBook";
import * as bookServices from "../../../apiServices/bookServices";

export default function FeatureComponent(props) {
    const [value, setValue] = React.useState(0);
    const [urll, setUrl] = useState("/get-recommend");
    const [Feature, setFeature] = useState([]);
    const handleTabs = (e, val) => {
        setValue(val);
        console.log(val);
        if (val === 0) {
            setUrl("get-recommend?limit=8");
        } else {
            setUrl("get-popular?limit=8");
        }
    };
    useEffect(() => {
        const getFeature = async () => {
            const results = await bookServices.getListBooks(urll);
            setFeature(results.book);
        };
        getFeature();
    }, [urll]);

    const slides0 = Feature.map((book, index) => {
        return (
            <div key={index} className="single-product">
                <CardBook detailBook={book} />
            </div>
        );
    });
    return (
        <div className="main-container">
            <div className="feature-book">Featured Books</div>
            <div className="Tabs-value" position="static">
                <Tabs value={value} onChange={handleTabs}>
                    <Tab label="Recommended" />
                    <Tab label="Popular" />
                </Tabs>
            </div>
            <TabPanel value={value} index={0}>
                <div className="feature-product">{slides0}</div>
            </TabPanel>
            <TabPanel value={value} index={1}>
                <div className="feature-product">{slides0}</div>
            </TabPanel>
        </div>
    );
}
function TabPanel(Props) {
    const { children, value, index } = Props;
    return <div>{value === index && <h1>{children}</h1>}</div>;
}
