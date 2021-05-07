const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            padding: "1rem"
        },
        fontFamily: {
            display: [
                "Poppins",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "BlinkMacSystemFont",
                '"Segoe UI"',
                "Roboto",
                '"Helvetica Neue"',
                "Arial",
                '"Noto Sans"',
                "sans-serif",
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"'
            ]
        },
        extend: {
            maxWidth: {
                fluid: "1700px"
            },
            colors: {
                primary: "#171D26",
                secondary: "#6B7280",
                green: {
                    "100": "#d1eecc",
                    "200": "#8dd680",
                    "300": "#5fc54d",
                    "400": "#48bd33",
                    "500": "#1aac00",
                    "600": "#158a00",
                    "700": "#158a00",
                    "800": "#0d5600",
                    "900": "#083400"
                }
            },
            spacing: {
                "120": "30rem"
            }
        }
    },
    variants: {
        extend: {
            borderWidth: ["last"]
        }
    },
    corePlugins: {
        container: false
    },
    plugins: [
        function({ addComponents }) {
            addComponents({
                ".container": {
                    maxWidth: "100%",
                    width: "100%",
                    paddingRight: "1rem",
                    paddingLeft: "1rem",
                    "@screen sm": {
                        maxWidth: "768px"
                    },
                    "@screen md": {
                        maxWidth: "1024px"
                    },
                    "@screen lg": {
                        maxWidth: "1280px"
                    },
                    "@screen xl": {
                        maxWidth: "1400px"
                    }
                }
            });
        }
    ]
};
