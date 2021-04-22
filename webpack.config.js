const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
        fallback: {
            "fs": false,
            "http": false,
            "https": false,
            "child_process": false,
          } 
    }
};