import { DATA_SET, LAVEL, X_LAVEL, Y_LAVEL } from "./data/Data.js";

const ctx = document.getElementById("graph");
const district = Object.keys(DATA_SET);
const rate = Object.values(DATA_SET);

const randomColor = () => {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgba(${r}, ${g}, ${b}, 0.9)`;
};

const randomColorArray = () => {
    const colorArray = [];
    for (let i = 0; i < district.length; i++) {
        colorArray.push(randomColor());
    }
    return colorArray;
};

const GraphData = {
    labels: district,
    datasets: [
        {
            label: LAVEL,
            data: rate,
            backgroundColor: [...randomColorArray()],
            borderRadius: 5,
        },
    ],
};
new Chart(ctx, {
    type: "bar",
    data: GraphData,
    options: {
        indexAxis: "y",
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false,
                },
                title: {
                    display: true,
                    text: Y_LAVEL,
                    font: {
                        size: 15,
                    },
                },
            },
            x: {
                beginAtZero: true,
                grid: {
                    display: true,
                },
                title: {
                    display: true,
                    text: X_LAVEL,
                    font: {
                        size: 15,
                    },
                },
            },
        },
    },
});
