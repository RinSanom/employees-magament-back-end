read -p "Enter commit message: " msg

git add .
git commit -m "$msg"
git push -u origin master

echo "✅ Code pushed to Git successfully!"