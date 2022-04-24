const path = require('path');

module.exports = {
    mode: "production",
    watchOptions: {
        ignored: /node_modules/,
    },
    entry: "./app.js",
    output: {
        path: path.resolve(__dirname, 'bundle'),
        filename: '[name].js'
    },
    plugins: [
        {
            apply: compiler => {
                compiler.hooks.afterEmit.tap('AfterEmitBuild', compilation => {
                    console.log('building webpack...');
                })
            }
        }
    ],
}