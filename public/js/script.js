document.addEventListener("DOMContentLoaded", () => {
    // SE PINTE LA SECCION
    const navigation_links = document.querySelectorAll(".navigation-item");
    const active_url = window.location.href;
    navigation_links.forEach((link) => {
        if (link.href === active_url) {
            link.classList.add("active");
        }
    });

    // MANEJO DE MODALES
    const modalCreateTag = document.getElementById("tag-modal-create");
    const btnAddTag = document.getElementById("button-add-tag");
    const closeXCreateTag = modalCreateTag?.querySelector(".close-btn-create");
    const closeBtnCreateTag = modalCreateTag?.querySelector(
        ".close-modal-create",
    );

    if (btnAddTag && modalCreateTag) {
        btnAddTag.addEventListener(
            "click",
            () => (modalCreateTag.style.display = "block"),
        );
    }
    if (closeXCreateTag)
        closeXCreateTag.addEventListener(
            "click",
            () => (modalCreateTag.style.display = "none"),
        );
    if (closeBtnCreateTag)
        closeBtnCreateTag.addEventListener(
            "click",
            () => (modalCreateTag.style.display = "none"),
        );

    const modalEditTag = document.getElementById("tag-modal-edit");
    const formEditTag = document.getElementById("form-edit-tag");
    const inputEditTagName = document.getElementById("input-edit-name");
    const closeXEditTag = modalEditTag?.querySelector(".close-btn-edit");
    const closeBtnEditTag = modalEditTag?.querySelector(".close-modal-edit");
    const editTagBtns = document.querySelectorAll(".button-edit-tag");

    editTagBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const name = this.getAttribute("data-name");
            const url = this.getAttribute("data-url");
            if (inputEditTagName) inputEditTagName.value = name;
            if (formEditTag) formEditTag.action = url;
            if (modalEditTag) modalEditTag.style.display = "block";
        });
    });

    if (closeXEditTag)
        closeXEditTag.addEventListener(
            "click",
            () => (modalEditTag.style.display = "none"),
        );
    if (closeBtnEditTag)
        closeBtnEditTag.addEventListener(
            "click",
            () => (modalEditTag.style.display = "none"),
        );

    // MODAL DE CATEGORIAS
    const modalCreateCat = document.getElementById("modal-create-category");
    const btnAddCat = document.getElementById("button-add-category");
    const closeXCreateCat = modalCreateCat?.querySelector(".close-create-cat");
    const closeBtnCreateCat = modalCreateCat?.querySelector(
        ".close-modal-create-cat",
    );

    if (btnAddCat && modalCreateCat) {
        btnAddCat.addEventListener(
            "click",
            () => (modalCreateCat.style.display = "block"),
        );
    }
    if (closeXCreateCat)
        closeXCreateCat.addEventListener(
            "click",
            () => (modalCreateCat.style.display = "none"),
        );
    if (closeBtnCreateCat)
        closeBtnCreateCat.addEventListener(
            "click",
            () => (modalCreateCat.style.display = "none"),
        );

    const modalEditCat = document.getElementById("modal-edit-category");
    const formEditCat = document.getElementById("form-edit-category");
    const inputEditCatName = document.getElementById(
        "input-edit-category-name",
    );
    const closeXEditCat = modalEditCat?.querySelector(".close-edit-cat");
    const closeBtnEditCat = modalEditCat?.querySelector(
        ".close-modal-edit-cat",
    );
    const editCatBtns = document.querySelectorAll(".button-edit-category");

    editCatBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const name = this.getAttribute("data-name");
            const url = this.getAttribute("data-url");
            if (inputEditCatName) inputEditCatName.value = name;
            if (formEditCat) formEditCat.action = url;
            if (modalEditCat) modalEditCat.style.display = "block";
        });
    });

    if (closeXEditCat)
        closeXEditCat.addEventListener(
            "click",
            () => (modalEditCat.style.display = "none"),
        );
    if (closeBtnEditCat)
        closeBtnEditCat.addEventListener(
            "click",
            () => (modalEditCat.style.display = "none"),
        );

    // MODAL DE TAREAS
    const modalCreateTask = document.getElementById("modal-create-task");
    const btnAddTask = document.getElementById("button-add-task");
    const closeXCreateTask =
        modalCreateTask?.querySelector(".close-create-task");
    const closeBtnCreateTask = modalCreateTask?.querySelector(
        ".close-modal-create-task",
    );

    if (btnAddTask && modalCreateTask) {
        btnAddTask.addEventListener(
            "click",
            () => (modalCreateTask.style.display = "block"),
        );
    }
    if (closeXCreateTask)
        closeXCreateTask.addEventListener(
            "click",
            () => (modalCreateTask.style.display = "none"),
        );
    if (closeBtnCreateTask)
        closeBtnCreateTask.addEventListener(
            "click",
            () => (modalCreateTask.style.display = "none"),
        );

    const modalViewTask = document.getElementById("modal-view-task");
    const viewTaskBtns = document.querySelectorAll(".button-view-task");
    const closeXViewTask = modalViewTask?.querySelector(".close-view-task");
    const closeBtnViewTask = modalViewTask?.querySelector(
        ".close-modal-view-task",
    );

    viewTaskBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            document.getElementById("view-title").value =
                this.getAttribute("data-title");
            document.getElementById("view-description").value =
                this.getAttribute("data-description");
            document.getElementById("view-category").value =
                this.getAttribute("data-category");
            document.getElementById("view-tags").value =
                this.getAttribute("data-tags");
            document.getElementById("view-status").value =
                this.getAttribute("data-status");

            if (modalViewTask) modalViewTask.style.display = "block";
        });
    });

    if (closeXViewTask)
        closeXViewTask.addEventListener(
            "click",
            () => (modalViewTask.style.display = "none"),
        );
    if (closeBtnViewTask)
        closeBtnViewTask.addEventListener(
            "click",
            () => (modalViewTask.style.display = "none"),
        );

    const modalEditTask = document.getElementById("modal-edit-task");
    const editTaskBtns = document.querySelectorAll(".button-edit-task");
    const formEditTask = document.getElementById("form-edit-task");
    const closeXEditTask = modalEditTask?.querySelector(".close-edit-task");
    const closeBtnEditTask = modalEditTask?.querySelector(
        ".close-modal-edit-task",
    );
    const editCheckboxes = document.querySelectorAll(".edit-tag-checkbox");

    editTaskBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            document.getElementById("edit-title").value =
                this.getAttribute("data-title");
            document.getElementById("edit-description").value =
                this.getAttribute("data-description");
            document.getElementById("edit-category").value =
                this.getAttribute("data-category-id");
            document.getElementById("edit-status").value =
                this.getAttribute("data-status");
            if (formEditTask)
                formEditTask.action = this.getAttribute("data-url");

            const tagsIds = JSON.parse(this.getAttribute("data-tags-ids"));

            editCheckboxes.forEach((checkbox) => {
                const id = parseInt(checkbox.value);
                checkbox.checked = tagsIds.includes(id);
            });

            if (modalEditTask) modalEditTask.style.display = "block";
        });
    });

    if (closeXEditTask)
        closeXEditTask.addEventListener(
            "click",
            () => (modalEditTask.style.display = "none"),
        );
    if (closeBtnEditTask)
        closeBtnEditTask.addEventListener(
            "click",
            () => (modalEditTask.style.display = "none"),
        );

    window.addEventListener("click", (e) => {
        if (e.target === modalCreateTag) modalCreateTag.style.display = "none";
        if (e.target === modalEditTag) modalEditTag.style.display = "none";
        if (e.target === modalCreateCat) modalCreateCat.style.display = "none";
        if (e.target === modalEditCat) modalEditCat.style.display = "none";
        if (e.target === modalCreateTask)
            modalCreateTask.style.display = "none";
        if (e.target === modalViewTask) modalViewTask.style.display = "none";
        if (e.target === modalEditTask) modalEditTask.style.display = "none";
    });
});
