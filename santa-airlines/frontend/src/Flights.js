import Styles from "./Flights.module.css";
import DashedLine from "./DashedLine.js";
function Flights(props) {
  return (
    <>
      <article>
        <ul className="origin-info">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-plane-departure"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M14.639 10.258l4.83 -1.294a2 2 0 1 1 1.035 3.863l-14.489 3.883l-4.45 -5.02l2.897 -.776l2.45 1.414l2.897 -.776l-3.743 -6.244l2.898 -.777l5.675 5.727z" />
            <path d="M3 21h18" />
          </svg>
          <li>{props.origin}</li>
          <li>{props.originDate}</li>
        </ul>
        <div className={Styles.containerFlightInfo}>
          <h2>{props.flightDuration}</h2>
          <h2>{props.flightNumber}</h2>
          <DashedLine className={Styles.DashedLine}/>
        </div>
        <ul className="destination-info">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-plane-arrival"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M15.157 11.81l4.83 1.295a2 2 0 1 1 -1.036 3.863l-14.489 -3.882l-1.345 -6.572l2.898 .776l1.414 2.45l2.898 .776l-.12 -7.279l2.898 .777l2.052 7.797z" />
            <path d="M3 21h18" />
          </svg>

          <li>{props.destination}</li>
          <li>{props.destinationDate}</li>
        </ul>
      </article>
    </>
  );
}

export default Flights;
