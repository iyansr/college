const { PrismaClient } = require("@prisma/client");
const faker = require("@faker-js/faker").faker;

const prisma = new PrismaClient();

async function main() {
  //   console.log("Seeding categories...");
  //   await prisma.categories.createMany({
  //     data: Array.from(Array(10).keys()).map((i) => ({
  //       name: faker.commerce.department(),
  //       description: faker.commerce.productDescription(),
  //     })),
  //   });
  //   console.log("Seeding categories complete");

  //   console.log("Seeding supplier...");
  //   await prisma.supplier.createMany({
  //     data: Array.from(Array(10).keys()).map((i) => ({
  //       name: faker.company.name(),
  //       address: faker.location.streetAddress(),
  //       website: faker.internet.url(),
  //       email: faker.internet.email(),
  //     })),
  //   });
  //   console.log("Seeding supplier complete");

  //   console.log("Seeding products...");

  const categories = await prisma.categories.findMany();
  const supplier = await prisma.supplier.findMany();

  await prisma.items.createMany({
    data: Array.from(Array(60).keys()).map((i) => ({
      name: faker.commerce.productName(),
      category_id: categories[Math.floor(Math.random() * categories.length)].id,
      supplier_id: supplier[Math.floor(Math.random() * categories.length)].id,
      quantity: faker.number.int({ min: 1, max: 100 }),
      price: Number(
        faker.commerce.price({
          dec: 0,
          min: 50000,
          max: 5000000,
        })
      ),
      unit: "pcs",
    })),
  });
}

main()
  .catch((e) => {
    throw e;
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
