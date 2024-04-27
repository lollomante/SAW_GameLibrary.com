$(document).ready(function () {
    $("#users").DataTable({
      ajax: {
       url: "process/get_user_list.php",
       dataType: 'json'
      },
      columns: [
        { data: "user_id" },
        { data: "firstname" },
        { data: "lastname" },
        { data: "email" },
        { data: "admin" },
        { data: "banned" },
        { data: "delete"},
      ],
      order: [
        [3, "asc"],
      ],
    });
  });

/*made on earth by humans*/
