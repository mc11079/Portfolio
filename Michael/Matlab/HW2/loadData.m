function [ D, Y ] = loadData(filename)
%   D Y - Output args, filename - input args
%   Load data from filename to:
%       1. matrix D (data matrix)
%       2.vecotr Y (prediction vector)
%   File name: Every row = feature vals and last num is the val we need to
%   predict. Each row holds from left to right: Cost, age, updated cost

file=load(filename);
numOfcols = size(file,2);
Y = file(:, numOfcols);
numOfcols=numOfcols-1;
D=file(:,1:numOfcols);

end