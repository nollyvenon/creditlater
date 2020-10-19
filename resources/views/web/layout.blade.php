<!DOCTYPE html>
<html lang="en">
<head>
    @include("web.header.meta")
    <title>Document</title>
</head>
<body class="bg-light ">
    <section>
        @include("web.header.top-navigation")
        @include("web.header.middle-navigation")
        @include("web.header.bottom-navigation")
    </section>
    
    <!-- body -->
    <section>
        @yield("content")
    </section>
    
    <!-- footer -->
     <section>
        @include("web.footer")
        @include("web.notification")
        @include("web.newsletter-popup")
     </section>
     
    <!-- script -->
       <section>
       @include("web.script")
       </section>
       

</body>
</html>

