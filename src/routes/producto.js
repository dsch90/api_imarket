const express = require("express");
const ProductoController = require("../controllers/producto");

const api = express.Router();

api.get("/holaMundo",ProductoController.holaMundo);
api.post("/createProducto",ProductoController.createProducto);
api.get("/getProductos",ProductoController.getProductos);
api.get("/getProductosByCategoria",ProductoController.getProductosByCategoria);
api.get("/getProductosByDescripcion",ProductoController.getProductosByDescripcion);
api.put("/updateProducto",ProductoController.updateProducto);
api.delete("/deleteProducto",ProductoController.deleteProducto);

module.exports = api;
