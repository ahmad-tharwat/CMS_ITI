// Task 1
alert("Welcom to my file");
function get_username() {
        let user_name = prompt("Please enter your name");
        var regex = /^[a-zA-Z]+$/;
        if (!user_name.match(regex)) {
                alert("Wrong input! Try again");
                return get_username();
        }
        return user_name;
}

let user = get_username();

document.write("<h1>Welcome " + user + "</h1>");

// Task 2
function temperature() {
        let temp = Number(prompt("What is today temperature?"));
        temp >= 30 ? document.write("HOT") : document.write("COLD");
        document.write("<br>");
}
temperature();

// Task 3
function contact() {

        document.write("Name: " + user + "<br>");

        document.write("Birth year: ");
        function birth() {
                let birth_year = Number(prompt("Enter your birth date"));
                if (birth_year < 2010) {
                        document.write(birth_year + "<br>");
                        let age = 2024 - birth_year;
                        return age;
                } else {
                        alert("Invalid Age!");
                        return birth();
                        // return;
                }
        }
        document.write("Age: " + birth() + "<br>");
}
contact();

// Task 4
for (let index = 1; index <= 6; index++) {
        document.write("<h" + index + ">" + "Welcome to my page" + "</h" + index + ">");
}

document.write("This is spagetti work, I just hate JS");