// Task 1 - user info
function get_name() {
    let user_name = prompt("Please enter your name");
    if (!user_name.match(RegExp(/^[a-zA-Z ]+$/))) {
        alert("Wrong input! Try again");
        return get_name();
    }
    document.write("Welcome " + user_name + "<br>")
}
function get_phone() {
    let user_phone = prompt("Please enter your phone number (in 8 digits format)");
    if (!user_phone.match(RegExp(/^[\d]{8}$/))) {
        alert("Wrong input! Try again");
        return get_phone();
    }
    return user_phone;
}
function get_mobile() {
    let user_mobile = prompt("Please enter your mobile number (Egypt standards)");
    if (!user_mobile.match(RegExp(/^01[012][0-9]{8}$/))) {
        alert("Wrong input! Try again");
        return get_mobile();
    }
    return user_mobile;
}
function get_email() {
    let user_email = prompt("Please enter your email address");
    if (!user_email.match(RegExp(/^\S+@\S+\.\S+$/))) {
        alert("Wrong input! Try again");
        return get_email();
    }
    return user_email;
}
// function get_color() { 
//     let user_color = prompt("Enter your favourite color");
//     if (!user_color.match(RegExp(/^\S+@\S+\.\S+$/))) {
//         alert("Wrong input! Try again");
//         return get_color();
//     }
//     return user_color;
// }

document.write("<h1>Entering user info</h1>");
document.write("Welcome " + get_name() + "<br>");
document.write("Your phone is " + get_phone() + "<br>");
document.write("Your mobile is " + get_mobile() + "<br>");
document.write("Your email is " + get_email() + "<br>");

// Task 2 - split string
function get_string() {
    let user_input = new String(prompt("Enter a string of multiple words"));
    const words = user_input.split(' ');
    let largest_word = '';
    let largest_length = 0;
    for (let word of words) {
        if (word.length > largest_length) {
            largest_word = word;
            largest_length = word.length;
        }
    }
    return largest_word;
}
document.write("Largest word: " + get_string() + "<br>");

// Task 3 - Sort array
function sortArray() {
    let arr = [];

    for (let i = 0; i < 5; i++) {
        let value = parseFloat(prompt(`Array taks: enter index ${i}:`));
        while (isNaN(value) || value === "") {
            value = parseFloat(prompt(`Please enter a valid numerical value for value ${i + 1}:`));
        }
        arr.push(value);
    }
    let ascendingOrder = arr.slice().sort((a, b) => a - b);
    let descendingOrder = arr.slice().sort((a, b) => b - a);
    document.write("<p>Original Array: " + arr + "</p>");
    document.write("<p>Ascending Order: " + ascendingOrder + "</p>");
    document.write("<p>Descending Order: " + descendingOrder + "</p>");
}
sortArray();

// Task 4 - math calculations
function calc_radius() {
    let radius = parseFloat(prompt("Enter the radius of the circle to calculate its area:"));
    let circleArea = Math.PI * Math.pow(radius, 2);
    alert(`The area of the circle is ${circleArea.toFixed(2)}`);
}
function calc_sqrt() {
    let number = parseFloat(prompt("Enter a number to calculate its square root:"));
    let squareRoot = Math.sqrt(number);
    alert(`The square root of ${number} is ${squareRoot}`);
}
function calc_cos() {
    let angle = parseFloat(prompt("Enter an angle in degrees to calculate its cosine value:"));
    let angleInRadians = angle * (Math.PI / 180); // Convert angle to radians
    let cosValue = Math.cos(angleInRadians);
    document.write(`<p>cos ${angle}\xB0 is ${cosValue.toFixed(4)}</p>`);
}
calc_radius();
calc_sqrt();
calc_cos();