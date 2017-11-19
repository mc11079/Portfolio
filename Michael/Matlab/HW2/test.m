filename='ex2data1.txt';
alpha = 0.001;
max_iter = 1000;
threshold = 0.00001;
[Costs, FinalHypothesis] = gradientDescent(filename, alpha, max_iter, threshold);
