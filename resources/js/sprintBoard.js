// Class in where to drop the target
const dropTarget = document.querySelector(".board");

// THe cards to drag
const draggables = document.querySelectorAll(".task");

// Setting the eventlistener to dragable cards
for (let i=0; i<draggables.length; i++) {
    draggables[i].addEventListener("dragstart", function (ev) {
        ev.dataTransfer.setData("backlogId", ev.target.id);
    });
}

// The eventlistener when the item is over the board
dropTarget.addEventListener("dragover", function (ev) {
    ev.preventDefault();
});

// The eventlistener when item is dropped
dropTarget.addEventListener("drop", function (ev) {
    ev.preventDefault();
    if (!ev.target.classList.contains("box")) {
        return;
    }
    // Get the data for the request
    const backlogId = ev.dataTransfer.getData("backlogId");
    const state = $(ev.target).attr("data-state");

    if (!backlogId || !state) {
        return;
    }

    // Setting up the ajax request
    $.ajax({
        type: "POST",
        url:  "/api/updateState",
        data: {
            action: "move",
            "backlogId": backlogId,
            "state": state
        }
    }).done(function(data) {
        if (data === "OK") {
            ev.target.appendChild(document.getElementById(backlogId));
        }
    }).fail(function(ctx) {
        alert(ctx.responseText);
        console.log(ctx.responseText);
    });
});
