function [ error_vector ] = check_error( matrix,vector_error )
%UNTITLED11 Summary of this function goes here
%   Detailed explanation goes here
error_vector=zeros(1,3);
vector_e=vector_error(1,:);
if vector_e == zeros(1,12)
    error_vector=zeros(1,3);
else
    [bool,num]=scanner( matrix,vector_e,1 );
    if bool==true
        error_vector=[num 0 0];
    else
       i=1;
       while i<24
           check=vector_e+matrix(i,:);
           check=mod(check,2);
           [bool,num]=scanner( matrix,check,i+1 );
           if bool==true
               error_vector=[i num 0];
               break;
           else
               i=i+1;
           end
       end
       i=1;
       if bool==false
           flag=true;
           j=i+1;
           while i<24&&flag==true
               while j<24
                   check=vector_e;
                   check=check+matrix(i,:);
                   check=mod(check,2);
                   check=check+matrix(j,:);
                   check=mod(check,2);
                   [bool,num]=scanner( matrix,check,j+1 );
                   if bool==true
                        error_vector=[i j num];
                        flag=false;
                        break;
                   else
                       j=j+1;
                   end
               end
               i=i+1;
               j=i+1;
           end
       end
    end
    if bool==false
        error_vector=[-1 -1 -1];
    end
end
end

