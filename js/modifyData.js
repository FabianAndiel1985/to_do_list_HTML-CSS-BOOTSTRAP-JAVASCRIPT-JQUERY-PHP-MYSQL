// function remove data from database and the whole node

deleteTask = function (event) {
      event.preventDefault();
      let currentTableData = event.currentTarget.parentElement.parentElement;
      let dueDate = currentTableData.querySelector(".dueDate").innerHTML;
      let important = currentTableData.querySelector(".important").innerHTML;
      let description = currentTableData.querySelector(".description").innerHTML;

      request = $.ajax({
                 url: "./backend/deleteTask.php",
                 type: "post",
                 data: {data1: dueDate, data2:important, data3:description}
             });

             request.done(function (response, textStatus, jqXHR){
                if(response == 1) {
                  currentTableData.remove();
                }
             });

              request.fail(function (jqXHR, textStatus, errorThrown){
           
                 console.error(
                     "The following error occurred: "+
                     textStatus, errorThrown
                 );
             });
    }


// inital adding the function for removing the data from the database and the node

$(".fas").on("click",deleteTask);

// inital adding the function for entering the data into the database, adding the data node in html and the remove possibility to the trash can symbol

$("#enterTaskBtn").click(
			function(event) {
				event.preventDefault();

        // form validation

        let formValid = true;

        let dateInput = $("input[name='dueDate']").val();
        let importanceSelect = $("select[name='importance']").val();
        let descriptionTextarea = $("textarea[name='description']").val();

         if (!dateInput) {
                $("input[name='dueDate']").after("<span class='text-danger'> This field can't be empty <i class='fas fa-arrow-up'></i></span>");
                formValid = false;
         }; 

         if (!importanceSelect) {
                $("select[name='importance']").after("<span class='text-danger'> This field can't be empty <i class='fas fa-arrow-up'></i></span>")
                formValid = false;
         };

         if (descriptionTextarea == '') {
                $("textarea[name='description']").after("<span class='text-danger'> This field can't be empty <i class='fas fa-arrow-up'></i></span>")
                formValid = false;
         };

         if (formValid) {

				let form = $(this).parent();
				let formElments =  form.find("input,textarea,select");
				let serializedData = formElments.serialize();

				request = $.ajax({
           			url: "./backend/enterIntoTaskList.php",
           			type: "post",
           			data: serializedData
       			});

       			request.done(function (response, textStatus, jqXHR){
           		  
                // adding the node into the html	
                let tbody = document.querySelector(".tbody");
                tbody.insertAdjacentHTML('beforeend', response);
                
                // adding delete possibility
                $(".fas").on("click",deleteTask)
       			});

       			 request.fail(function (jqXHR, textStatus, errorThrown){
           
           			console.error(
               			"The following error occurred: "+
               			textStatus, errorThrown
           			);
       			});

			}
    }

		);
