import React, { useState, useEffect } from "react";
import Style from "./App.module.css";
import DashedLine from "./DashedLine.js";
import Flights from "./Flights.js";
import Header from "./Header.js";
function App() {
  const [jsonData, setJsonData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function getData() {
      const response = await fetch("https://tu.proti.lv/flights/");
      const data = await response.json();
      setJsonData(data);
      setLoading(!true);
    }

    getData();
  }, []);

  const FlightsJSX = jsonData.map((data) => {
    let departureDateTime = new Date(data.departureDateTime);
    let arrivalDateTime = new Date(data.arrivalDateTime);
    return (
      <>
        <Flights
          origin={data.origin}
          originDate={departureDateTime.toLocaleString("en-US", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
          })}
          area={data.area}
          destination={data.destination}
          destinationDate={arrivalDateTime.toLocaleString("en-US", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
          })}
          flightDuration={data.flightDuration}
          flightNumber={data.flightNumber}
        />
      </>
    );
  });

  return (
    <>
      <h1>Flight schedule</h1>
      {loading ? <div class="loader">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#49d1e0" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>
    </svg>
</div> : FlightsJSX}
    </>
  );
}

export default App;
