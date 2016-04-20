This is the code for the active website 'lakefotos.com'.

It is designed for a photographer to manage pictures and clients

The site contains pages for an administrator to login and upload pictures to various categories to be viewed by the public.  The pics 
are uploaded to AWS S3 using the AWS SDK.  For each picture uploaded, a copy with reduced dimensions is automatically uploaded to a 
separate S3 folder for optimal mobile viewing.  

The administrator is also able to manage a database of clients, and upload pictures to a specific client's profile.  Clients are given
their own username and password that they can use to see their private pics.

The site also uses the Google Maps API to show the locations where the various pictures were taken.
