const express= require("express");
const app = express();

app.use(express.json());
app.use(express.urlencoded({exctended:true}));

module.exports = app;
const producto_routes = require("./routes/producto");

app.use("/api",producto_routes);