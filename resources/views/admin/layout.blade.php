<!DOCTYPE html>
<html lang="en">
    <head>
    @include("admin.header.meta")
    @yield("title")
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
             @include("admin.footer.footer")
             </section>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
         <section>
         @include("admin.header.rightsidebar")
         </section>


         
         <!-- js scripts -->
        <section>
        @include("admin.script")
        </section>


    </body>
</html>