
<!DOCTYPE html>
<html lang="en">
    <head>
    @include("vendor.header.meta")
   <title> @yield("title")</title>
    </head>
    <body>


        <!-- Begin page -->
        <div id="wrapper">
            @yield("navigations")

            
            <section>
            @yield("content")
            </section>


            <!-- Footer Start -->
             <section>
             @include("vendor.footer.footer")
             </section>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
         <section>
             @include("vendor.header.rightsidebar")
         </section>


         
         <!-- js scripts -->
        <section>
            @include('vendor.dropdown')
            @include("vendor.script")
        </section>


    </body>
</html>
