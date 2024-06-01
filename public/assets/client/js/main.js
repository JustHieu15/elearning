// studenthome
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1,
        }
    );

    cards.forEach((card) => {
        observer.observe(card);
    });
});

// login-register
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("container");

    const registerBtn = document.getElementById("register");
    if (registerBtn) {
        registerBtn.addEventListener("click", () => {
            container.classList.add("active");
        });
    }

    const loginBtn = document.getElementById("login");
    if (loginBtn) {
        loginBtn.addEventListener("click", () => {
            container.classList.remove("active");
        });
    }

    const emailInput = document.getElementById("emailInput");
    if (emailInput) {
        emailInput.focus(); // Tự động đặt trỏ chuột vào trường email khi tải trang
    }
});

// studenttest
var element = document.getElementById("cancelButton"); // check element
if (element) {
    document
        .getElementById("cancelButton")
        .addEventListener("click", function () {
            if (confirm("Bạn có muốn thoát không?")) {
                // Thực hiện hành động khi người dùng chọn "OK"
                console.log("Thoát");
                // Ví dụ: window.location.href = "http://example.com"; // Redirect đến một trang khác
            } else {
                // Không thực hiện chuyển hướng khi người dùng chọn "Cancel"
                console.log("Tiếp tục ở lại");
                // Ví dụ: không làm gì cả, giữ người dùng ở lại trang hiện tại
            }
        });
}
// studenttest check time
document.querySelectorAll('.form-check-input').forEach(input => {
    input.addEventListener('change', function() {
        const question = this.getAttribute('data-question');
        const icon = document.querySelector(`.fa-check-circle[data-question="${question}"]`);
        if (icon) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            icon.style.color = '#ffa200';
        }
    });
});

// upcomingcourses // currentcourses
function redirectToSelectedPage(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    if (selectedOption.value !== "") {
        window.location.href = selectedOption.value;
    }
}

// finishedcourses
document.addEventListener("DOMContentLoaded", function () {
    var courseSelect = document.getElementById("courseSelect");
    if (courseSelect) {
        courseSelect.addEventListener(
            "change",
            function handleCourseSelectChange() {
                var selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value !== "") {
                    window.location.href = selectedOption.value;
                }
            }
        );
    }
});

// blog
var heartIcons = document.querySelectorAll(".heart-icon");
heartIcons.forEach(function (icon) {
    icon.addEventListener("click", function () {
        this.classList.toggle("far");
        this.classList.toggle("fas");
        this.style.color = this.classList.contains("fas") ? "#ff0000" : "#000";
    });
});

function openShareModal() {
    document.getElementById("shareModal").style.display = "block";
}
function closeShareModal() {
    document.getElementById("shareModal").style.display = "none";
}
function share(platform) {
    console.log("Sharing on " + platform);
    alert("Sharing on " + platform + " successful!");
    closeShareModal();
}

//settingstudent //settingprv
// document.getElementById("myForm").addEventListener("submit", function (event) {
//     event.preventDefault(); // Ngăn chặn việc nộp biểu mẫu
//     var inputs = document.querySelectorAll("input[required]");
//     var allFilled = true;
//
//     inputs.forEach(function (input) {
//         if (input.value === "") {
//             allFilled = false;
//             return;
//         }
//     });
//
//     if (allFilled) {
//         // Nếu tất cả các trường đều được điền
//         showSuccessMessage();
//     } else {
//         alert("Vui lòng điền đầy đủ thông tin.");
//     }
// });

function showSuccessMessage() {
    // Hiển thị thông báo thành công
    alert("Saved successfully!");
}
